<?php

// Определяем класс User с полями name, surname и email
class User
{
    private string $name;
    private string $surname;
    private string $email;

    public function __construct(string $name, string $surname, string $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

// Определяем класс UserList для хранения списка пользователей
class UserList
{
    private array $users = [];

    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }

    public function removeUser(User $user): void
    {
        foreach ($this->users as $key => $value) {
            if ($value === $user) {
                unset($this->users[$key]);
            }
        }
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}

// Определяем интерфейс для фабрики пользователей
interface UserFactoryInterface
{
    public function createUser(string $name, string $surname, string $email): User;
}

// Реализуем фабрику для создания объектов User
class UserFactory implements UserFactoryInterface
{
    public function createUser(string $name, string $surname, string $email): User
    {
        return new User($name, $surname, $email);
    }
}

$userFactory = new UserFactory();
$userList = new UserList();
$userList->addUser($userFactory->createUser('Ivan', 'Ivanov', 'Ivan@example.com'));
$userList->addUser($userFactory->createUser('Petr', 'Petrov', 'petr@example.com'));
$userList->addUser($userFactory->createUser('Andrew', 'Andreew', 'andrew@example.com'));

// Выводим список пользователей в HTML-таблице
echo '<table>';
echo '<tr><th>Name</th><th>Surname</th><th>Email</th></tr>';
foreach ($userList->getUsers() as $user) {
    echo '<tr>';
    echo '<td>' . $user->getName() . '</td>';
    echo '<td>' . $user->getSurname() . '</td>';
    echo '<td>' . $user->getEmail() . '</td>';
    echo '</tr>';
}
echo '</table>';
