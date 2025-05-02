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

Add the below content into `composer.json`
```json
{
  "name": "your-project-name",
  "require": {}
}
```

## 📦 Installation
Install the Styley PHP SDK via Composer.

```bash
composer require styley/styley-php-sdk:dev-main
```
## ⚙️ Usage
This guide demonstrates how to initialize the SDK and interact with the available methods for deployments and models.

## 🌐 Set `X_STYLEY_KEY` Environment Variable
### PowerShell
```powershell
$env:X_STYLEY_KEY = "your-api-key-here"
```
### Bash
```bash
export X_STYLEY_KEY="your-api-key-here"
```

# 🏆 **Deployments**
### 📤 Create Deployment

The **Create Deployment** method allows you to create a new deployment using a `model name` and `arguments`. It returns an output with a `job_id` that you can use to fetch the final results.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;
use \Styley\Deployments\DeploymentInput;

$client = new Client();
$createdeployment = $client->deployments->create(
    new DeploymentInput(
        "Background Removal",
        "844218fa-c5d0-4cee-90ce-0b42d226ac8d",
        [
            "input" => "https://cdn.mediamagic.dev/media/799f2adc-384e-11ed-8158-e679ed67c206.jpeg"
        ]
    )
);
echo "Deployment created:\n";
echo json_encode($createdeployment, JSON_PRETTY_PRINT); 
```

**With Additional Parameters:**

- **output_format** (str, optional): Output format for the result.
  - Images: `png`, `jpg`, `jpeg`, `gif`, `bmp`, `tiff`, `webp`, `ico`
  - Videos: `mp4`, `webm`, `mkv`, `mov`, `avi`

- **output_width** (int, optional): Output image width in pixels (positive integer)
- **output_height** (int, optional): Output image height in pixels (positive integer)

Note: For image resizing, both width and height must be specified together. If only one dimension is provided, the original image size will be maintained.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;
use \Styley\Deployments\DeploymentInput;

$client = new Client();
$createdeployment = $client->deployments->create(
    new DeploymentInput(
        "Background Removal",
        "844218fa-c5d0-4cee-90ce-0b42d226ac8d",
        [
            "input" => "https://cdn.mediamagic.dev/media/799f2adc-384e-11ed-8158-e679ed67c206.jpeg"
        ],
        "png",
        1024,
        1024
    )
);
echo "Deployment created:\n";
echo json_encode($createdeployment, JSON_PRETTY_PRINT); 
```

## 📄 **Get Deployment By ID**
Retrieve deployment details by ID.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;
use \Styley\Deployments\Deployments;

$client = new Client();

// Replace with actual deployment_id from deployment response
$deployment = $client->deployments->getById("deployment_id");

echo "Deployment details retrieved:\n";
echo json_encode($deployment, JSON_PRETTY_PRINT);
```

## 📜 **Get Job**
Retrieve the status of a deployment job using its job ID.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;

$client = new Client();

// Replace with actual job_id from Deployement response
$jobStatus = $client->deployments->getJob("job_id");

echo "Job status retrieved:\n";
echo json_encode($jobStatus, JSON_PRETTY_PRINT);
```

# ⚡**Models**
## 📜**List Models**
Retrieve a list of all models available for deployments.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;

$client = new Client();

$models = $client->models->list();

echo "Models retrieved:\n";
echo json_encode($models, JSON_PRETTY_PRINT);
```

## 🔍 **Get Model By ID**
Fetch model details using its model ID.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;

$client = new Client();

$model = $client->models->getById("model_id");

echo "Model retrieved:\n";
echo json_encode($model, JSON_PRETTY_PRINT);
```
## 🔍 **Get Model By Name**
Fetch model details using its name.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use \Styley\Client;

$client = new Client();

$model = $client->models->getByName("Virtual Staging Fast");

echo "Model retrieved:\n";
echo json_encode($model, JSON_PRETTY_PRINT);
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