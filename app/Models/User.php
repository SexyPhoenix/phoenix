<?php
namespace App\Models;

class User {
    
    protected $emails = [];

    protected $githubs = [];

    public function getEmailByName(string $name)
    {
        $this->setEmails();

        return array_key_exists($name, $this->emails) ? $this->emails[$name] : ''; 
    }

    public function getGithubByName($name)
    {
        $this->setGithubs();

        return array_key_exists($name, $this->githubs) ? $this->githubs[$name] : ''; 
    }

    public function setEmails()
    {
        $this->emails = [
            'SexyPhoenix' => 'sexyphoenix@163.com'
        ];
    }

    public function setGithubs()
    {
        $this->githubs = [
            'SexyPhoenix' => 'https://github.com/SexyPhoenix'
        ];
    }
}
?>