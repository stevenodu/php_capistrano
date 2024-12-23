# php_capistrano
This is a simple PHP calculator that you will deploy into an AWS EC2 instance using capistrano.

Capistrano is a Ruby-based tool, so you’ll need to configure it with scripts for deployment tasks such as uploading code, restarting services, and setting up dependencies.

Below is a step by step guide on installing, setting up and deploying using capistrano.

**1. Install Capistrano**
Ensure you have Ruby installed, then install Capistrano and any necessary plugins:
`gem install capistrano`
`gem install capistrano-composer` # If you're using Composer for PHP dependencies


**2. Initialize Capistrano**
Run the following command in your project directory to set up Capistrano:
`cap install`
This creates the following structure:
├── Capfile
├── config
│   ├── deploy.rb
│   ├── deploy
│   │   └── production.rb
│   │   └── staging.rb
├── lib
│   └── capistrano
│       └── tasks


**3. Configure deploy.rb**
Edit the config/deploy.rb file to define global settings for your deployment:
>config/deploy.rb

>Application name
set :application, "php_app"

>Repository URL (use your git repository)
set :repo_url, "git@github.com:yourusername/your-php-app.git"

>Deployment directory on the server
set :deploy_to, "/var/www/#{fetch(:application)}"

>PHP-specific configurations
set :php_path, "/usr/bin/php" # Path to PHP binary
set :composer_install_flags, '--no-dev --quiet --optimize-autoloader' # Composer flags

>Files and directories to be linked between deployments
append :linked_files, "config/database.php"
append :linked_dirs, "storage", "vendor"

>Number of releases to keep
set :keep_releases, 5


**4. Configure Environment Files**
Edit config/deploy/production.rb and config/deploy/staging.rb to define server-specific settings:

**Example:** config/deploy/production.rb
`server "your-server-ip", user: "your-username", roles: %w{app web db}, primary: true`

Define the branch to deploy
`set :branch, "main"`

**Example**: config/deploy/staging.rb
`server "your-staging-server-ip", user: "your-username", roles: %w{app web db}, primary: true`

Define the branch to deploy
`set :branch, "develop"`


**5. Add Deployment Tasks**
Define custom tasks in the Capfile or lib/capistrano/tasks directory to automate deployment steps. For example:

Restarting Apache:
* *Capfile* *
`namespace :deploy do
  after :publishing, :restart do
    on roles(:app) do
      execute :sudo, :systemctl, :restart, "apache2"
    end
  end
end`


Running Composer (if applicable):
# Capfile
require "capistrano/composer"


**6. Deploy Using Capistrano**
To deploy your application, run:
cap production deploy

Capistrano will:

Clone the repository.
Upload it to the deployment directory.
Perform tasks like restarting services or running Composer.


**7. Automate Deployment (Optional)**
To fully automate deployment (e.g., using CI/CD pipelines):

Add Capistrano commands to your CI/CD pipeline (e.g., GitHub Actions, GitLab CI).
Use an SSH key for secure access to your servers.
Trigger the pipeline when changes are pushed to the repository.


**8. Optional: deploy.rb Configuration for Automation**
You can define additional hooks for automated steps like running tests or cleaning up:#

>Run tests before deployment
before "deploy:starting", "deploy:run_tests"

namespace :deploy do
  desc "Run tests"
  task :run_tests do
    on roles(:app) do
      within release_path do
        execute :php, "artisan test" # Example for Laravel; modify as needed
      end
    end
  end
end
