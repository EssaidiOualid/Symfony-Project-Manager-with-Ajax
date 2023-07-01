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

Installation
Follow these steps to install and run the Projects Manager application:

Clone the repository: git clone https://github.com/your-username/projects-manager.git
Install dependencies: composer install
Configure the database connection in the .env file.
Run database migrations: php bin/console doctrine:migrations:migrate
Start the development server: symfony serve
Make sure you have PHP and Symfony CLI installed on your system before proceeding with the installation.

Usage
Admin: As an admin, You can manage users, creating projects, clients, teams.
Manager: Managers can track and manage projects, create and assign tasks, and monitor their progress. They have limited administrative capabilities.
Member: Members have access to assigned projects and tasks. They can update task statuses, add comments, and collaborate with other team members.
