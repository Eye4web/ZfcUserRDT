<?php

use Eye4web\ZfcUserRDT\Inspector\UserInspector;
use Eye4web\ZfcUserRDT\Renderer\ToolbarTab\ToolbarUserRenderer;

 return [
     'service_manager' => [
         'invokables' => [
             UserInspector::class => UserInspector::class,
             ToolbarUserRenderer::class => ToolbarUserRenderer::class,
         ],
     ],
     'roave_developer_tools' => [
         'inspectors'                  => [
             UserInspector::class,
         ],
         'toolbar_tab_renderers'       => [
             ToolbarUserRenderer::class,
         ],
     ],
     'view_manager' => [
         'template_path_stack' => [
             realpath(__DIR__ . '/../view'),
         ],
     ],
 ];