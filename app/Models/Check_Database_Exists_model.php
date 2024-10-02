<?php

namespace App\Models;

use CodeIgniter\Model;

class Check_Database_Exists_model extends model
{
	protected $userTableName = 'users';
	protected $postTableName = 'post';
	protected $commentTableName = 'comment';
	protected $UploadsTableName = 'Uploads';

	public function checkAndCreateUsersTable()
    {
        // Connect to the database
        $db = \Config\Database::connect();
        
        // Check if the 'users' table exists
        $checkTableQuery = "SHOW TABLES LIKE 'users'";
        $queryResult = $db->query($checkTableQuery);

        if ($queryResult->getNumRows() == 0) {
            // Table doesn't exist, create the 'users' table
            $createTableQuery = "
                CREATE TABLE `users` (
                    `username` VARCHAR(100) NOT NULL PRIMARY KEY,
                    `password` VARCHAR(255) NOT NULL,
                    `email` VARCHAR(255) NOT NULL,
                    `security_question_1` VARCHAR(255) NOT NULL,
                    `security_question_2` VARCHAR(255) NOT NULL,
                    `security_question_3` VARCHAR(255) NOT NULL,
                    `verification_token` VARCHAR(255) DEFAULT NULL,
					`email_verified` TINYINT(1) DEFAULT 0
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ";
            $db->query($createTableQuery);
            return "Table 'users' has been created.";
        } else {
            return "Table 'users' already exists.";
        }
    }

	public function checkAndCreatePostTable()
	{

		// Connect to the database
        $db = \Config\Database::connect();
        
        // Check if the 'post' table exists
        $checkTableQuery = "SHOW TABLES LIKE 'post'";
        $queryResult = $db->query($checkTableQuery);

		if ($queryResult->getNumRows() == 0) {
            // Table doesn't exist, create the 'post' table
            $createTableQuery = "
                CREATE TABLE `post` (
                    `post_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `postUsername` VARCHAR(255) NOT NULL,
                    `postTitle` VARCHAR(255) NOT NULL,
                    `postDatetime` timestamp NOT NULL,
                    `postCourse` VARCHAR(255) NOT NULL,
                    `postContent` VARCHAR(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ";
            $db->query($createTableQuery);
            return "Table 'post' has been created.";
        } else {
            return "Table 'post' already exists.";
        }

	}

	public function checkAndCreateCommentTable()
	{

		// Connect to the database
        $db = \Config\Database::connect();
        
        // Check if the 'comment' table exists
        $checkTableQuery = "SHOW TABLES LIKE 'comment'";
        $queryResult = $db->query($checkTableQuery);

		if ($queryResult->getNumRows() == 0) {
            // Table doesn't exist, create the 'comment' table
            $createTableQuery = "
                CREATE TABLE `comment` (
                    `post_id` INT(11) NOT NULL PRIMARY KEY,
                    `commentUsername` VARCHAR(255) NOT NULL,
                    `commentContent` VARCHAR(255) NOT NULL,
                    `commentDatetime` timestamp NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ";
            $db->query($createTableQuery);
            return "Table 'comment' has been created.";
        } else {
            return "Table 'comment' already exists.";
        }

	}

	public function checkAndCreateUploadsTable()
	{

		// Connect to the database
        $db = \Config\Database::connect();
        
        // Check if the 'Uploads' table exists
        $checkTableQuery = "SHOW TABLES LIKE 'Uploads'";
        $queryResult = $db->query($checkTableQuery);

		if ($queryResult->getNumRows() == 0) {
            // Table doesn't exist, create the 'Uploads' table
            $createTableQuery = "
                CREATE TABLE `Uploads` (
                    `username` VARCHAR(255) NOT NULL PRIMARY KEY,
                    `title` VARCHAR(255) NOT NULL,
                    `filename` timestamp NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ";
            $db->query($createTableQuery);
            return "Table 'Uploads' has been created.";
        } else {
            return "Table 'Uploads' already exists.";
        }

	}
}