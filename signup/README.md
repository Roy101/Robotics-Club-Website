# HTML Email sender using PHPMailer SMTP

Using this php script, you can send email using SMTP PHPMailer Library. Set the configuration as below and you are good to go.

## Designing email

In the repository there is a file named <a href="template_design.html">template_design.html</a>. Open the file and edit it as you want to your desired html design. A sample design is already added here.

<img src="images/ss1.png" width="100%"/>

## Setting up the SMTP

Open the file "sendMail.php". You will find some fields that you need to fill up with your own SMTP Configuration.

<img src="images/ss2.png" width="100%"/>

## Setting up the Sender & Receiver

You can set the sender and receiver dynamically using php variables or you can use static one. You can also set this on "sendMail.php"

<img src="images/ss3.png" width="100%"/>

## Setting up the Email Body

On the same "sendMail.php" file, you will see a section $message. This will contain the whole HTML template that you designed. You can use static email template or use dynamic values to HTML using PHP Script. Just set the PHP variable as below if you need to set values dynamically.

<img src="images/ss4.png" width="100%"/>

## Sending the email

Once everything is set, run the "sendMail.php". You will get success message if email is sennt successfully and also the error message if it fails.

# License

### PHPMailer
PHPMailer - A full-featured email creation and transfer class for PHP is owned by [PHPMailer](https://github.com/PHPMailer/PHPMailer). This software is distributed under the LGPL 2.1 license, along with the GPL Cooperation Commitment. Please read LICENSE for information on the software availability and distribution.

### Code
The code in this repository, including all code samples in the notebooks listed above, is released under the MIT license. Read more at the [Open Source Initiative](https://opensource.org/licenses/MIT).
