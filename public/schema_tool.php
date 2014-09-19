<?php
// Create database schema from entities.
$em = $application->getBootstrap()->getResource('doctrine');

$doctrineTool = new \Doctrine\ORM\Tools\SchemaTool($em);

$classes = array(
$em->getClassMetadata('Entities_User')
);
$doctrineTool->createSchema($classes);