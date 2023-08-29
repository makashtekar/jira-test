# Task Management System (JIRA)

## Tech

- **Laravel** v10.20.0 - PHP Framework!
- **MySQL** v8.0.33 - Database
- **Blade** - Template Engine.
- **Tailwind CSS** - CSS
- **Alpine JS** - Lightweight JS
- **Breeze** - Authentication System

## Installation

1. Install the dependencies and devDependencies

```sh
git clone  [https://github.com/makashtekar/jira-test][jira-test]
cd jira-test
composer install
```

2. Update environment file .env

```sh
DB_CONNECTION=mysql
DB_HOST=YOUR_DB_HOST
DB_PORT=YOUR_DB_PORT
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD

```

Migrate and seed the database

```sh
php artisan migrate --seed
```

There will be initial 5 users and random 20 project assigned to the random user

3. Build with vite

```sh
npm run build
```

4. Launch Application

For Development

```sh
php artisan serve
```

## CONCULUSION 

### What I liked : 

Given instruction was perfect, and you allowed to use any library and tailwind :)

Requirement was easy achievable

### What I didn’t like : 

Only time frame : I thought the practical test would take hardly 2 hours, but according to requirement it can take much more time then i expected 


### Estimated time to complete :

- User should be able to sign up and login : 10 minutes using breeze

- User should be able to Create, Update and Delete projects : 30 Minutes
  
- Users should be able add tasks under specific project : 30 minutes
  
- Tasks should be editable and also can be deleted. : 20 minutes

- Tasks should be prioritized within a project : 10 minutes

- Also tasks should have deadlines : 10 minutes

- Apply proper status(to-do, in-progress,done) of tasks : 10 minutes

- Users should have only access to his/her own projects and tasks. : 10 minutes
  
- Designing with tailwind : 1 hour
  
- Github upload : 20 minutes (Syncing with SSH key)


========================================

Total Time consumed : 3.5 hours

========================================



### Pending tasks : 

- Under the task, the user can add comments and make sure the nested comment is applicable so that if we want to respond to the specific comment then we should be able to do that.

- Comment should be deletable

- Users can also attach files in comment and task description.

- It should have automated tests for all functionality.

