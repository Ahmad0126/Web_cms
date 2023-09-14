<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif{
    function set($pesan, $warna){
        return '
		<div class="alert alert-'.$warna.' alert-dismissable fade show notifikasi" role="alert">
			<i class="mdi mdi-exclamation"></i>'.$pesan.'
		</div>';
    }
}