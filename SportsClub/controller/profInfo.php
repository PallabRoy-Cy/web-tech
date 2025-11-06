<?php
require_once(__DIR__ . '/../model/model.php');

function fetchAllProfiles(){
	return showAllProfiles();
}
function fetchProfile($id){
	return showProfile($id);
}
