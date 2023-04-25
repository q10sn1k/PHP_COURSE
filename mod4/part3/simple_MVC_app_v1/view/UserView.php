<?php

class UserView
{
    private UserList $userList;

    public function __construct(UserList $userList)
    {
        $this->userList = $userList;
    }

    public function render(): void
    {
        echo '<table>';
        echo '<tr><th>Name</th><th>Surname</th><th>Email</th></tr>';
        foreach ($this->userList->getUsers() as $user)
        {
            echo '<tr>';
            echo '<td>' . $user->getName() . '</td>';
            echo '<td>' . $user->getSurname() . '</td>';
            echo '<td>' . $user->getEmail() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}