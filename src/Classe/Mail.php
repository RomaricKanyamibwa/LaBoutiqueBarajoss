<?php

namespace App\Classe;



use Mailjet\Client;
use Mailjet\Resources;


class Mail

 {
     private $api_key = "723a1a96db6f7de464995ba178c2c17c";
     private $api_key_secret = "fb480c8d04966d772155feb4eae98bdd";

    public function send($to_email, $to_name, $subject, $content)
     {
         
         $mj = new Client($this->api_key,$this->api_key_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "sagesse8320@gmail.com",
                        'Name' => "La Boutique Barajoss"
                    ],
                    'To' => [
                        [
                            'Email' => "$to_email",
                            'Name' => "$to_name"
                        ]
                    ],
                     'TemplateID' => 5076495,
                     'TemplateLanguage' => true,
                     'Subject' => $subject,
                     'Variables'=> [
                         'content' => $content,
                   
                    ]
                 ]
             ]
        ];
        
        // All resources are located in the Resources class
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        // Read the response
         $response->success(); 
     }
    }
 
?>
