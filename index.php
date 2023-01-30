<?php

define("URI", explode("/",$_SERVER["REQUEST_URI"]));

enum Install {
    case SERVER;
    case WEB;

    public function getFile(): string {
        return match($this){
            Install::SERVER => "installPartarumServer",
            Install::WEB => "installPartarumWeb"
        };
    }

    public function sendFile(): void {

        header("Content-Description: File Transfer");
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=installPartarum.sh');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
}

enum User {

    case REGISTERED;

    case UNREGISTERED;
}

class Token {
    static public function check() {

    }
}

/*
 *
 */

switch(URI[0]) {
    case "Plesk":
    case "plesk":
    case "Keyhelp":
    case "keyhelp":
        Install::WEB->sendFile();
        break;
    default:
        Install::SERVER->sendFile();
}