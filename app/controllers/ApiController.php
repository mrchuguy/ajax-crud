<?php

class ApiController extends Controller {

    public function action_index() {
	
    }

    public function action_add() {
	var_dump($_POST, $_FILES);
	$title = filter_input(INPUT_POST, 'title');
	$text = filter_input(INPUT_POST, 'text');
	$file = $_FILES[image];
	if ($file['error'] !== UPLOAD_ERR_OK) {
	    $message = 'Some error';
	} else if (in_array($file['type'], ALLOWED_TYPES)) {
	    $message = 'Не тот тип файла';
	} else if ($file['size'] > MAX_IMAGE_FILE) {
	    $message = 'Слишком большой файл';
	} else if (!move_uploaded_file($file['tmp_name'], IMAGES_DIRECTORY . DIRECTORY_SEPARATOR . $file['name'])) {
	    $message = 'Файл не загружен';
	} else {
	    $message = 'ok';
	}
    }

}
