# LMFA
This Package Help You To Connect To Microsoft Face APi 
by Mohammad Najafian
# Installation
#### install With Composer
```
 composer require ikosar/lmfa 
 ```
#### After : 

```
 php artisan vendor:publish 
 ```
 # Config
 Open ``` lmfa.php ``` in config folder in laravel root then you can enter you'r `` api_key `` in this file !
 # Usage 
 #### Normal Request  (Return To You Face's info)
 ##### 1 .  First we need to do this : 
 ``` 
  $face = new CheckFace();
 ```
 ##### 2 .  We Set The Url : 
  if you want to customize the url Do this : (default : https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect)
  ````
    $face->setUrl($url);
  ````
  
 ```
         $image = array(
             'url' => 'http://cdn-tehran.wisgoon.com/dlir-s3/10531466806488528869.JPG',
         );
 
         $face = new CheckFace();
         $face->setUrl($image);
         $face->setMethod("post");
         $face->setHeaders(array(
             'Content-Type' => 'application/json',
             'Ocp-Apim-Subscription-Key' => $face->getApiKey(),
         ));
         $face->setParameters(array(
             'returnFaceId' => 'true',
             'returnFaceLandmarks' => 'false',
             'returnFaceAttributes' => 'age,gender,glasses,smile,noise,hair,accessories,emotion,makeup',
         ));
         $face->setBody();
         $face->check();
         $face->send();

 ```
