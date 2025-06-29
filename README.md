<img src="https://github.com/user-attachments/assets/9bb08b29-b35b-4094-b49d-6642bd7ce705" alt="Imagem" height="80">

## About the project

This is a simple to-do list project built with Laravel. Created for portfolio purposes to practice Laravel basics and CRUD operations.

#### Features

- Add tasks  
- Edit tasks  
- Mark tasks as completed  
- Delete tasks  

#### Technologies

- Laravel  
- PHP  
- Tailwind CSS  
- SQLite  

## Main Files

#### Routes

- [routes/web.php](routes/web.php) - Application route definitions

#### Requests

- [app/Http/Requests/TaskRequest.php](app/Http/Requests/TaskRequest.php) - Task request  

#### Models

- [app/Http/Models/Task.php](app/Http/Models/Task.php) - Task model  
- [app/Http/Models/User.php](app/Http/Models/User.php) - User model  

#### Controllers

- [app/Http/Controllers/TaskController.php](app/Http/Controllers/TaskController.php) - Task controller  

#### Views

- [resources/views/tasks/index.blade.php](resources/views/tasks/index.blade.php) – Task list page  
- [resources/views/tasks/create.blade.php](resources/views/tasks/create.blade.php) – Create task form  
- [resources/views/tasks/edit.blade.php](resources/views/tasks/edit.blade.php) – Edit task form  
- [resources/views/tasks/show.blade.php](resources/views/tasks/show.blade.php) – Task details page  
- [resources/views/tasks/form.blade.php](resources/views/tasks/form.blade.php) – Reusable form partial  