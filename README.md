# iOS-Push-Apps
Apple Push Notification Service - Apple Developer

Details:

Mac Terminal Command:

DeviceToken:
2dcec7ae4d6131188c7acdd0628c6014c5991d806a1609074fc48a43b739f76b

-----------------------------------------------------
openssl pkcs12 -clcerts -nokeys -out cert.pem -in cert.p12

openssl pkcs12 -nocerts -out key.pem -in key.p12

//openssl rsa -in key.pem -out key.unencrypted.pem

//cat cert.pem key.unencrypted.pem  >  ck.pem

cat cert.pem key.pem  >  ck.pem
-----------------------------------------------



Apple developer account & certification creation issue take help following url
https://www.youtube.com/watch?v=_3YlqWWnI6s
