    public function loginUser($email, $password) {
        $sql = "SELECT user_id, username, password, is_admin FROM school_publication_users WHERE email = ?";
        $user = $this->executeQuerySingle($sql, [$email]);

        if ($user && password_verify($password, $user['password'])) {
            $this->startSession();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = (bool)$user['is_admin'];
            return true;
        }
        return false;
    }
<?php
echo password_hash("admin123", PASSWORD_DEFAULT) . PHP_EOL;
echo password_hash("writer123", PASSWORD_DEFAULT) . PHP_EOL;
echo password_hash("password", PASSWORD_DEFAULT) . PHP_EOL;
echo password_hash("secret123", PASSWORD_DEFAULT) . PHP_EOL;
