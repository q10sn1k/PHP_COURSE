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
        // Форма для добавления пользователей
        echo '<h2>Add User</h2>';
        echo '<form method="POST">';
        echo 'Name: <input type="text" name="name"><br>';
        echo 'Surname: <input type="text" name="surname"><br>';
        echo 'Email: <input type="email" name="email"><br>';
        echo '<input type="submit" value="Add User">';
        echo '</form>';

        // Таблица со списком пользователей
        echo '<h2>User List</h2>';
        echo '<table>';
        echo '<tr><th>Name</th><th>Surname</th><th>Email</th><th>Actions</th></tr>';
        foreach ($this->userList->getUsers() as $user) {
            echo '<tr>';
            echo '<td>' . $user->getName() . '</td>';
            echo '<td>' . $user->getSurname() . '</td>';
            echo '<td>' . $user->getEmail() . '</td>';
            echo '<td><a href="?delete=' . $user->getId() . '">Delete</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}