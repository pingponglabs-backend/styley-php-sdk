# 🚀 Styley - PHP SDK

## 📥 **Install PHP**
### Option 1: Install Using System Package Manager (Linux/Unix)

**For Ubuntu/Debian:**
```bash

sudo apt update
sudo apt install php php-cli php-mbstring unzip curl
```
**For CentOS/RHEL:**
```bash

sudo yum install epel-release
sudo yum install php php-cli php-mbstring unzip curl
```
## Option 2: Install Using Homebrew (MacOS)
```bash
brew update
brew install php
```

### Option 3: Install PHP on Windows
1. Download the PHP installer:

    👉 https://www.php.net/downloads.php

2. Extract the files to C:\php.

3. Add PHP to System PATH:

    - Open Control Panel → System → Advanced System Settings → Environment Variables.
    - Edit the Path variable and add:
```makefile
C:\php
```
4. Restart your terminal to apply changes.

## **Verify Installation**
Check if PHP is installed and working correctly.

```bash
php -v
```
**Expected output:**

```scss
PHP 8.1.2 (cli) (built: Jan 22 2024 13:05:35) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.1.2, Copyright (c) Zend Technologies
```
If you see "command not found," double-check that PHP is installed and is in your PATH.

## **📦Install Composer**
Composer is a dependency manager for PHP, like npm for JavaScript or pip for Python.

**Option 1: Automatic Installation (Linux/MacOS)**
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
**Option 2: Install Using Installer (Windows)**

1. Download the Composer installer:
    👉 https://getcomposer.org/download/

2. Follow the on-screen instructions.

3. Verify Composer installation:
    ```bash
    composer -v
    ```
**Expected output:**
```yaml
Composer version 2.6.0 2024-04-10 00:13:15
```
Note: If you see "command not found," ensure Composer is installed and is in your PATH.

## 📁 **Setup Project Workspace**
Create a project directory:
```bash
mkdir php-sdk-project
cd php-sdk-project
```
Create a composer.json file in the project directory:

```bash
touch composer.json
```

## 📦 Installation
Install the Styley PHP SDK via Composer.

```bash
composer require styley/styley-php-sdk
```
## ⚙️ Usage
This guide demonstrates how to initialize the SDK and interact with the available methods for deployments and models.

# 🏆 **Deployments**
### 📤 Create Deployment
This method creates a new deployment using the specified model ID, name, and arguments.
```php
use \Styley\Client;

$client = new Client();
$createdeployment = $client->deployments->create(
    new DeploymentInput(
        "Property Details and Maps",
        "6db33e45-29cf-4880-8ee0-3d9074c32e5e",
        [
            "City" => "Arlington",
            "State" => "VA",
            "Basement" => true,
            "Number of BathRoom" => 1,
            "Number of BedRoom" => 1,
            "Garage" => false,
            "Stories" => 1,
            "Pool" => false
        ]
    )
);
```

## 📄 **Get Deployment By ID**
Retrieve deployment details by ID.

```php
use \Styley\Client;

$client = new Client();

// <job_id> - replace with actual jobID from Deployement response
$deployment = $client->deployments->getById("<deployment_id>");
```

## 📜 **Get Job**
Retrieve the status of a deployment job using its job ID.

```php
use \Styley\Client;

$client = new Client();

// <job_id> - replace with actual jobID from Deployement response
$jobStatus = $client->deployments->getJob("<job_id>");
```

# ⚡**Models**

## 📜**List Models**
Retrieve a list of all models available for deployments.

```php
use \Styley\Client;

$models = $client->models->list();
```

## 🔍 **Get Model By ID**
Fetch model details using its model ID.

```php
use \Styley\Client;

$model = $client->models->getById("6db33e45-29cf-4880-8ee0-3d9074c32e5e");
```
## 🔍 **Get Model By Name**
Fetch model details using its name.

```php
use \Styley\Client;

$model = $client->models->getByName("Property Details and Maps");
```
## 📘 **Summary of Available Methods**

Class       |Method           |Description 
------------|-----------------|-----------
Deployments |`create`(payload)|Create a new deployment.
Deployments |`getById`(id)    |Get deployment details by ID.
Deployments |`getJob`(jobID)  |Get the status of a deployment job.
Models      |`list()`         |List all available models.
Models      |`getById`(id)    |Get model details by model ID.
Models      |`getByName`(name)| Get model details by model name.