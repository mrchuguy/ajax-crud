<?php

class ApiController extends Controller
{
    public function action_index()
    {
        $this->model = new ApiModel();
        $news = $this->model->get_news();
        $json = json_encode($news);
        header('Content-type: application/json; charset=utf-8');
        echo $json;
    }

    public function action_add()
    {
        $title = filter_input(INPUT_POST, 'title');
        $text = filter_input(INPUT_POST, 'text');
        $file = $_FILES['image'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->message[] = 'Some error';
        } else if (!in_array($file['type'], ALLOWED_TYPES)) {
            $this->message[] = 'error type';
        } else if ($file['size'] > MAX_IMAGE_SIZE) {
            $this->message[] = 'big file';
        } else {
            if(!file_exists(IMAGES_DIRECTORY)){
                mkdir(IMAGES_DIRECTORY);
            }
            if (!move_uploaded_file($file['tmp_name'], IMAGES_DIRECTORY . DIRECTORY_SEPARATOR . $file['name'])) {
                $this->message[] = 'not load';
            } else {
                $this->model = new ApiModel();
                $this->model->add_news($title, $text, $file['name'], time());
            }
        }
    }
    public function action_delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->model = new ApiModel();
//        $image = $this->model->get_image_directory($id);
//        unset(IMAGES_DIRECTORY . DIRECTORY_SEPARATOR .$image);
        $this->model->delete_news($id);
    }

}
