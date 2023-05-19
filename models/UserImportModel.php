<?php namespace Eduzoneco\Management\Models;

use Backend\Models\ImportModel;
use Media\Classes\MediaLibrary;
use System\Models\File;
use Eduzoneco\Management\Models\Course;
use RainLab\Location\Models\State;
use RainLab\User\Models\User;

class UserImportModel extends ImportModel
{
    public $rules = [];

    public $imageStoragePath = '/users';

    public $imagePublic = true;

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            $data += [
                'is_activated' => true,
            ];

            if (empty($data['username'])) {
                $data['username'] = $data['email'];
            }

            if (empty($data['password'])) {
                $data['password'] = $data['username'];
            }

            if (empty($data['password_confirmation'])) {
                $data['password_confirmation'] = $data['password'];
            }

            try {
                $user = new User();
                $user->fill($data);

                // try to find avatar
                $avatar = $this->findAvatar($data['username']);
                if ($avatar) {
                    $user->avatar = $avatar;
                }

                // save user
                $user->save();

                // attach user to the selected classes
                if (!empty($_POST["ImportOptions"]["classes"])) {
                    $courseIds = $_POST["ImportOptions"]["classes"];
                
                    $courses = Course::whereIn('id', $courseIds)->get();
                
                    $user->courses()->attach($courses);
                }
                

                // activate user (it sends welcome email)
                $user->attemptActivation($user->activation_code);

                $this->logCreated();

            } catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }


    public function getClassesOptions() {
        return $courses = Course::orderBy('is_active', 'desc')
                ->orderBy('name')
                ->get()
                ->map(function ($course) {
                    $name = $course->name;
                    if ($course->is_active == 0) {
                        $name .= ' (Inactive)';
                    }
                    return ['id' => $course->id, 'name' => $name];
                })
                ->pluck('name', 'id')
                ->toArray();
    }

    /**
     * @param string $username
     * @return string|null
     */
    private function findAvatar($username)
    {
        $library = MediaLibrary::instance();
        $files = $library->listFolderContents($this->imageStoragePath, 'title', 'image');

        foreach ($files as $file) {
            $pathinfo = pathinfo($file->publicUrl);
            if ($pathinfo['filename'] == $username) {
                $newFile = new File();
                $newFile->is_public = $this->imagePublic;
                $newFile->fromFile(storage_path('app/media' . $file->path));

                return $newFile;
            }
        }
    }
}