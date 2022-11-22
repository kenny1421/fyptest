<?php
declare(strict_types=1);

use AzurePHP\Service\AzureBlobService;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;


if ([] === $_FILES || !isset($_FILES['blob'])) {
    echo file_get_contents(__DIR__ . '/Admin_UploadTask.php');
    return;
}
$connectionString = getenv('STORAGE_CONN_STRING') ?: '';
if ('' === $connectionString) {
    throw new InvalidArgumentException(
        'Please set the environment variable STORAGE_CONN_STRING with the Azure Blob Connection String'
    );
}
$blobClient = BlobRestProxy::createBlobService($connectionString);
$blobService = new AzureBlobService($blobClient);

$containerName = 'fileupload';
try {
    $blobService->addBlobContainer($containerName);
    $blobService->setBlobContainerAcl($containerName, AzureBlobService::ACL_BLOB);
} catch (ServiceException $serviceException) {
    // Log the exception, most likely because the container already exists
}

try {
    $fileName = $blobService->uploadBlob($containerName, $_FILES['blob']);
} catch (ServiceException $serviceException) {
    // Log the exception, most likely connectivity issue
}

$fileLink = sprintf(
    '%s/%s/%s',
    'https://azurephpstorage.blob.core.windows.net',
    strtolower($containerName),
    $fileName
);
echo sprintf(
    'Find the uploaded file at <a href="%s" target="_blank">%s</a>.',
    $fileLink,
    $fileLink
);
echo '<br><a href="/">Reset</a>';
