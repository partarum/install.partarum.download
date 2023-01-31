<?php

define("URI", explode("/",$_SERVER["REQUEST_URI"]));
define("USER_SYSTEM", $_POST["system"] ?? null);
define("USER_TOKEN", $_POST["token"] ?? null);

enum System {

    case PLESK;

    case KEYHELP;

    case BLANK;
}

enum InstallType {

    case LOADER;
    case SERVER;
    case WEB;

    public function getFile(): string {
        return match($this){
            InstallType::LOADER => "installPartarum",
            InstallType::SERVER => "testsh_server",
            InstallType::WEB => "testsh_web"
        };
    }
}

class Install {

    public static function sendFile(): void {

        $file = (Token::check(USER_TOKEN) !== NULL) ? match(USER_SYSTEM){
          "PLESK", "KEYHELP" => InstallType::WEB->getFile(),
          "BLANK" => InstallType::SERVER->getFile(),
          default => InstallType::LOADER->getFile()
        } : InstallType::LOADER->getFile();

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . filesize($file));
        readfile($file);
    }
}

class Token {
    static public function check($userToken) {

        // ! Hier USER_TOKEN überprüfen

        return $userToken;
    }
}

/*
 *  Ablauf
 *
 *  Abruf ohne Post - Parameter senden die installPartarum - Datei
 *  Abruf mit Post - Parameter senden die entsprechende Datei
 */

Install::sendFile();