<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-02-05 16:59:09 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Cookie.php:67
2014-02-05 16:59:09 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('PHPSESSID', NULL)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('PHPSESSID')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Cookie.php:67
2014-02-05 19:43:14 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: companyLogo ~ APPPATH\views\template.php [ 27 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\template.php:27
2014-02-05 19:43:14 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\views\template.php(27): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\Users\Phoeni...', 27, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(61): include('C:\Users\Phoeni...')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\Users\Phoeni...', Array)
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#10 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\template.php:27
2014-02-05 21:09:54 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function getUsers() ~ APPPATH\classes\Controller\Lab1.php [ 54 ] in file:line
2014-02-05 21:09:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-02-05 21:10:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function getUsers() ~ APPPATH\classes\Controller\Lab1.php [ 54 ] in file:line
2014-02-05 21:10:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-02-05 21:10:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function getUsers() ~ APPPATH\classes\Controller\Lab1.php [ 54 ] in file:line
2014-02-05 21:10:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-02-05 21:15:54 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function getUsers() ~ APPPATH\classes\Controller\Lab1.php [ 57 ] in file:line
2014-02-05 21:15:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-02-05 21:16:53 --- CRITICAL: ErrorException [ 2 ]: file_get_contents(users.json): failed to open stream: No such file or directory ~ APPPATH\classes\Controller\Lab1.php [ 8 ] in file:line
2014-02-05 21:16:53 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'file_get_conten...', 'C:\Users\Phoeni...', 8, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(8): file_get_contents('users.json')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(57): Controller_Lab1->getUsers()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:18:31 --- CRITICAL: ErrorException [ 2 ]: file_get_contents(users.json): failed to open stream: No such file or directory ~ APPPATH\classes\Controller\Lab1.php [ 8 ] in file:line
2014-02-05 21:18:31 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'file_get_conten...', 'C:\Users\Phoeni...', 8, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(8): file_get_contents('users.json')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(57): Controller_Lab1->getUsers()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:19:15 --- CRITICAL: ErrorException [ 2 ]: file_get_contents(../../data/users.json): failed to open stream: No such file or directory ~ APPPATH\classes\Controller\Lab1.php [ 8 ] in file:line
2014-02-05 21:19:15 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'file_get_conten...', 'C:\Users\Phoeni...', 8, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(8): file_get_contents('../../data/user...')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(57): Controller_Lab1->getUsers()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:27:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\classes\Controller\Lab1.php [ 59 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:59
2014-02-05 21:27:28 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(59): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\Users\Phoeni...', 59, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#4 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#7 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:59
2014-02-05 21:29:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\classes\Controller\Lab1.php [ 60 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:60
2014-02-05 21:29:04 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(60): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\Users\Phoeni...', 60, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#4 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#7 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:60
2014-02-05 21:29:29 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Lab1.php [ 55 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:55
2014-02-05 21:29:29 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(55): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\Users\Phoeni...', 55, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_login_user()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#4 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#7 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:55
2014-02-05 21:34:59 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type stdClass as array ~ APPPATH\classes\Controller\Lab1.php [ 13 ] in file:line
2014-02-05 21:34:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-02-05 21:35:45 --- CRITICAL: ErrorException [ 2 ]: array_push() expects parameter 1 to be array, object given ~ APPPATH\classes\Controller\Lab1.php [ 13 ] in file:line
2014-02-05 21:35:45 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_push() ex...', 'C:\Users\Phoeni...', 13, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(13): array_push(Object(stdClass), 'leckie')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(42): Controller_Lab1->addUserName('leckie')
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_add_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:38:09 --- CRITICAL: ErrorException [ 2 ]: array_push() expects parameter 1 to be array, object given ~ APPPATH\classes\Controller\Lab1.php [ 13 ] in file:line
2014-02-05 21:38:09 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_push() ex...', 'C:\Users\Phoeni...', 13, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(13): array_push(Object(stdClass), 'leckie')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(42): Controller_Lab1->addUserName('leckie')
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_add_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:38:28 --- CRITICAL: ErrorException [ 2 ]: array_push() expects parameter 1 to be array, object given ~ APPPATH\classes\Controller\Lab1.php [ 14 ] in file:line
2014-02-05 21:38:28 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_push() ex...', 'C:\Users\Phoeni...', 14, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(14): array_push(Object(stdClass), 'leckie')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(43): Controller_Lab1->addUserName('leckie')
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_add_user()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-02-05 21:46:55 --- CRITICAL: View_Exception [ 0 ]: The requested view lab1/user-details-others could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php:137
2014-02-05 21:46:55 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(137): Kohana_View->set_filename('lab1/user-detai...')
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(30): Kohana_View->__construct('lab1/user-detai...', NULL)
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(60): Kohana_View::factory('lab1/user-detai...')
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_userDetails()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php:137
2014-02-05 21:46:55 --- CRITICAL: View_Exception [ 0 ]: The requested view lab1/user-details-others could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php:137
2014-02-05 21:46:55 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(137): Kohana_View->set_filename('lab1/user-detai...')
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(30): Kohana_View->__construct('lab1/user-detai...', NULL)
#2 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(60): Kohana_View::factory('lab1/user-detai...')
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_userDetails()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#9 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php:137
2014-02-05 21:49:50 --- CRITICAL: ErrorException [ 8 ]: Undefined index: username ~ APPPATH\classes\Controller\Lab1.php [ 54 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:54
2014-02-05 21:49:50 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php(54): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\Users\Phoeni...', 54, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(84): Controller_Lab1->action_userDetails()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#4 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#7 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\classes\Controller\Lab1.php:54
2014-02-05 21:54:00 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: users ~ APPPATH\views\lab1\current-users.php [ 4 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php:4
2014-02-05 21:54:00 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\Users\Phoeni...', 4, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(61): include('C:\Users\Phoeni...')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\Users\Phoeni...', Array)
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\Users\Phoenix\Documents\GitHub\cs462\application\views\template.php(32): Kohana_View->__toString()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(61): include('C:\Users\Phoeni...')
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\Users\Phoeni...', Array)
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#11 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#14 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php:4
2014-02-05 21:54:38 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: users ~ APPPATH\views\lab1\current-users.php [ 4 ] in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php:4
2014-02-05 21:54:38 --- DEBUG: #0 C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\Users\Phoeni...', 4, Array)
#1 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(61): include('C:\Users\Phoeni...')
#2 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\Users\Phoeni...', Array)
#3 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\Users\Phoenix\Documents\GitHub\cs462\application\views\template.php(32): Kohana_View->__toString()
#5 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(61): include('C:\Users\Phoeni...')
#6 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\Users\Phoeni...', Array)
#7 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lab1))
#11 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\Users\Phoenix\Documents\GitHub\cs462\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 C:\Users\Phoenix\Documents\GitHub\cs462\index.php(118): Kohana_Request->execute()
#14 {main} in C:\Users\Phoenix\Documents\GitHub\cs462\application\views\lab1\current-users.php:4