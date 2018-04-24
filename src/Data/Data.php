<?php
namespace App\Data;
class Data
{
    private $info = '{
                "Po pamok\u0173": {
                    "mentor":"Tomas",
                    "members":["Elena","Just\u0117","Deimantas"]
                 },
                 "Tech Guide": {
                    "mentor":"Sergej",
                    "members":["Matas","Martynas"]
                 },
                 "Kelion\u0117s draugas": {
                    "mentor":"Rokas",
                    "members":["Zbignev","Aist\u0117"]
                 },
                 "Wish A Gift": {
                    "mentor":"Aistis",
                    "members":["Nerijus","Olga"]  
                 },
                 "Mums pakeliui": {
                    "mentor":"Paulius",
                    "members":["Egl\u0117","Svetlana"]
                 },
                 "Motyvacin\u0117 platforma": {
                    "mentor":"Audrius",
                    "members":["Viktoras","Airidas"]    
                 }
             }';
    private $students;
    private $teams;
    public function __construct()
    {
        $this->students = $this->createStudents();
        $this->teams = $this->createTeams();
    }
    private function createStudents()
    {
        $students = [];
        $data = json_decode($this->info, true);
        foreach($data as $teamData) {
            foreach ($teamData['members'] as $student) {
                $students[] = strtolower($student);
            }
        }
        return $students;
    }
    private function createTeams()
    {
        $teams = [];
        $data = json_decode($this->info, true);
        $teams = twig_get_array_keys_filter($data);
        $teams = array_map('strtolower', $teams);
        return $teams;
    }
    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }
    /**
     * @param array $students
     */
    public function setStudents(array $students): void
    {
        $this->students = $students;
    }
    /**
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }
    /**
     * @param mixed $teams
     */
    public function setTeams($teams): void
    {
        $this->teams = $teams;
    }
}