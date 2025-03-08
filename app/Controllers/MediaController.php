<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Media;

class MediaController extends Controller 
{
    protected $mediaModel;

    public function __construct() {
        $this->mediaModel = new Media();
    }

    /**
     * viewMedia lists all the media files of all the users
     * @return void
     */
    public function viewMedia()
    {
        $mediaItems = $this->mediaModel->getAllMedia();
        $this->view(
            'media/list', 
            [
                'page_title' => 'Media&Assets',
                'data'=>$mediaItems
            ]);
    }

    /**
     * loadMediaForm loads the media upload form into the globalModal
     * @return void
     */
    public function loadMediaForm()
    {
        $formData = $_POST;

        $this->load(
            'media/form', 
            [
                "data" => $formData
            ]);

    }

    public function loadMediaEditorForm()
    {
        $formData = $_POST;
        $this->load(
            'media/imageEditor',
            [
                "data" => $formData
            ]);
    }


    /**
     * uploadMedia saves the media file information to the database
     * @return void
     */
    public function uploadMedia()
    {
        $user_id = $_SESSION["user_id"];
        // Directory where files will be uploaded
        $targetDir = MEDIA_PATH . "media_files/" . $user_id . "/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Get the file information
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats (adjust as needed)
        $allowedTypes = ['jpg', 'png', 'jpeg', 'gif', 'mp4', 'avi', 'mp3', 'pdf'];
        
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                $filePath = "/media_files/" . $user_id . "/" . $fileName;
                
                // create the data array
                $data = [
                    'label' => $_POST["label"],
                    'type' => $_POST["type"],
                    'category' => $_POST["category"],
                    'description' => $_POST["description"],
                    'file_path' => $filePath,
                    'user_id' => $user_id
                ];

                // File upload success, save the file path in the database

                $insert = $this->mediaModel->saveMedia($data);


                // $insert = $db->insert('media', ['file_path' => $targetFilePath]);
                
                if ($insert) {
                    echo "The file $fileName has been uploaded and saved successfully.";

                    $this->redirect("media/list");

                } else {
                    echo "Database error: Could not save the file path.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Invalid file type. Only JPG, PNG, JPEG, GIF, MP4, AVI, MP3, and PDF files are allowed.";
        }


    }




}