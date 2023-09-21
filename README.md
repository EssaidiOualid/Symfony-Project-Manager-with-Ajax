# Projects-Manager V_1.0

Projects Manager is a project management tool built with Symfony 6. It allows you to efficiently manage and track projects within your organization. 
The system supports three types of users: admin, manager, and member, each with different levels of access and capabilities.

Features
User Roles: The system has three user roles: admin, manager, and member. Each role has specific permissions and access levels within the application.
Project Management: Create, update, and delete projects. Assign managers and members to projects and track their progress.
Task Tracking: Break down projects into tasks and assign them to team members. Monitor task status and completion.
File Attachments: Attach files and documents to projects and tasks for easy access and collaboration.
Reporting: Generate reports and analytics to gain insights into project progress, team performance, and more.
Chat: The Projects Manager application includes a real-time chat feature that allows team members to communicate and collaborate within the platform.
      The chat feature provides a centralized space for discussions, and sharing information related to projects and tasks.

## Installation
Follow these steps to install and run the Projects Manager application:

Clone the repository: git clone https://github.com/AbderrahamneBouda/projects-manager.git
Install dependencies: composer install
Configure the database connection in the .env file.
Run database migrations: php bin/console doctrine:migrations:migrate
Start the development server: symfony serve
Make sure you have PHP and Symfony CLI installed on your system before proceeding with the installation.

# Usage
<b>Admin:</b> As an admin, You can manage users, creating projects, clients, teams.

default email : <code>root@gmail.com</code>

default password : <code>root</code>

<b>Manager:</b> Managers can track and manage projects, create and assign tasks, and monitor their progress. They have limited administrative capabilities.

default password : <code>user123</code>

<b>Member:</b> Members have access to assigned projects and tasks. They can update task statuses, add comments, and collaborate with other team members.

default password : <code>user123</code>

# Setup

<b>1-Make sure to require the doctrine fixtures bundle</b>
<code>composer require --dev doctrine/doctrine-fixtures-bundle</code><br>

<b>2-Update the <code>.env</code> to match your DATABASE configuration</b><br>

<b>3-Create the DATABASE</b><br>
<code>symfony console doctrine:database:create</code><br>

<b>4-Execute the migration</b><br>
<code>symfony console doctrine:migrations:migrate</code><br>

<b>5-Run the Doctrine Fixtures</b><br>
<code>symfony console doctrine:fixtures:load</code>

