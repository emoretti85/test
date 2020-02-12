#!/usr/bin/php
<?php
namespace em\composerScripts;

use Composer\Script\Event;

define ("DS", DIRECTORY_SEPARATOR);


class InstallerScripts{
    public static function postInstall(Event $event){
        $composer = $event->getComposer();

        //Recupero il path del progetto
        $composerProjectBase = getcwd().DS;

        //Recupero il path del package
        $bootstrapSkeletonFolder = dirname(dirname(__FILE__)). DS . "skel";

        //Ciclo nella folder Skel dove sono le cartelle e i file da creare nel progetto
        foreach (glob($bootstrapSkeletonFolder . '/*' , GLOB_ONLYDIR) as $dir) {
            //Creo la cartella nel progetto
            mkdir($composerProjectBase.basename($dir));
            
            //Copio tutti i file
            $files = array_diff(scandir($dir), array('.', '..'));
            foreach ($files as $file) {
                copy($dir.DS.$file, $composerProjectBase.basename($dir).DS.$file);
            }
        }
    }
    public static function postPackageUpdate(Event $event)
    {
    $packageName = $event->getOperation()
        ->getPackage()
        ->getName();
    echo "$packageName\n";
    // do stuff
    }

    public static function warmCache(Event $event)
    {
    // make cache toasty
    }
}