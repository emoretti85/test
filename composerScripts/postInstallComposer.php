#!/usr/bin/php
<?php

$composerProjectBase = basename(realpath(".")).DIRECTORY_SEPARATOR;
echo "COMPOSER PROJECT BASE PATH : " . $composerProjectBase;

$projectBase = dirname(dirname(__FILE__));
echo "PACKAGE PROJECT BASE PATH : " . $projectBase;

$bootstrapSkeletonFolder = $projectBase. DIRECTORY_SEPARATOR . "skel";

$directories = glob($bootstrapSkeletonFolder . '/*' , GLOB_ONLYDIR);
foreach ($directories as $dir) {
    copy($dir, $composerProjectBase.basename($dir));
    echo "COPIO DIRECTORY : " . $dir . " IN " . $composerProjectBase.basename($dir);
}