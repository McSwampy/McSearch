<?php
	return [
		'encrypt'								=> function($data){
			if(is_array($data))
				$data							= json_encode($data);
			return htmlspecialchars(Cryp::htmlParameter($data));
		},
	];