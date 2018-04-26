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
 Open ``` lmfa.php ``` in config folder in laravel root then you can enter you'r ``` api_key ``` in this file !
 # Usage 
 #### Normal Request  (Return To You Face's info)
 ##### 1 .  First we need to do this  :100: :  
 ``` 
  $face = new CheckFace();
 ```
 ##### 2 .  We Set The Url : 
  if you want to customize the url Do this :100: : (default : https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect)
  ```
    $face->setUrl($url);
  ```
 ##### 3 .  Also Set Request Type ( post , get , delete , put ) :100: : 
  To this step we set the request's type (only lowercase) : 
  ```
    $face->setMethod("post");
  ```
 ##### 4 .  Set Headers :100: : 
  We Must to set headers to use Microsoft's Face APi (only lowercase) : 
  ##### if you want to put APi_key in Headers or Parameters Use This :
  ```
    $face->getApiKey();
  ```
  ```
    $face->setHeaders(array(
       'Content-Type' => 'application/json',
       'Ocp-Apim-Subscription-Key' => $face->getApiKey(),
    ));
  ```
   ##### 5 .  Set Parameters :100: : 
To this step we can set the Parameters :
```
  $face->setParameters(array(
      'returnFaceId' => 'true', // Recommended : True 
      'returnFaceLandmarks' => 'false', // Very information about face sizes
      'returnFaceAttributes' => 'age,gender,glasses,smile,noise,hair,accessories,emotion,makeup', // Your Requsted info
  ));
```
#####You can set these in the returnFaceAttributes in  parameters
Some Face Attributes : age , gender , glasses , smile , noise , hair , accessories , emotion , makeup ... 
//
##### 6 .  Set image :100: : 
#####Then , we need to set image :-) : 
We must to put image URL in the array Like This.
```
  $image = array(
      'url' => 'http://cdn-tehran.wisgoon.com/dlir-s3/10531466806488528869.JPG',
  );
  $face->setBody($image,true); // Set Image
        
```
##### 7 .  Check Request to complete set :100: : 
We must to Check Before ```$face->send()```.
```
         $face->check();
         $face->send();        
```
##### 8 .  Get Face Information in JSON :100: : 
Do This :
```
         $face->check();
         $result = $face->send();
         // Now JSON in $result  
         return $result;      
```
#  Finish And a Example: 


 ```
        $image = array(
            'url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Donald_Trump_August_19%2C_2015_%28cropped%29.jpg/245px-Donald_Trump_August_19%2C_2015_%28cropped%29.jpg',
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
        $face->setBody($image);
        $face->check();
        $result = $face->send();

 ```
#Licence
This Project is under the MIT Licence
#Read About Microsoft Face Api
###Types of requests
https://westcentralus.dev.cognitive.microsoft.com/docs/services/563879b61984550e40cbbe8d/operations/563879b61984550f30395236