#!/usr/bin/env bash

echo "=-=-=-=-=-=-=-=-=-=-=";
echo "= Building BabylonV =";
echo "=-=-=-=-=-=-=-=-=-=-=";

bash Less.sh
php ./Archiver.php
echo "Done building.";