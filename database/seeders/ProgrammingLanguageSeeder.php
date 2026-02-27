<?php

namespace Database\Seeders;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Seeder;

class ProgrammingLanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            [
                'name' => 'Python',
                'slug' => 'python',
                'icon' => 'code',
                'version' => '3.11',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Python is a high-level, interpreted programming language known for its simplicity and readability. Perfect for beginners and professionals alike.',
                'example_code' => '# Print a greeting
print("Hello, World!")

# Simple loop
for i in range(5):
    print(f"Count: {i}")',
                'syntax_highlighting_mode' => 'python',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'icon' => 'code',
                'version' => 'ES2024',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'JavaScript is a versatile language used for web development, with support for async/await, ES6+, and modern frameworks.',
                'example_code' => '// Welcome message
console.log("Hello, JavaScript!");

// Array iteration
[1, 2, 3].forEach(n => {
    console.log(`Number: ${n}`);
});',
                'syntax_highlighting_mode' => 'javascript',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'icon' => 'code',
                'version' => '8.2',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'PHP is a server-side scripting language. Widely used in web development with excellent frameworks like Laravel.',
                'example_code' => '<?php
// Basic PHP
echo "Hello, PHP!" . PHP_EOL;

// Loop example
for ($i = 0; $i < 3; $i++) {
    echo "Count: $i" . PHP_EOL;
}
?>',
                'syntax_highlighting_mode' => 'php',
            ],
            [
                'name' => 'Java',
                'slug' => 'java',
                'icon' => 'code',
                'version' => '21 LTS',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Java is a powerful, object-oriented language used in enterprise applications, Android development, and large-scale systems.',
                'example_code' => 'public class HelloWorld {
    public static void main(String[] args) {
        System.out.println("Hello, Java!");
        
        for (int i = 0; i < 3; i++) {
            System.out.println("Count: " + i);
        }
    }
}',
                'syntax_highlighting_mode' => 'java',
            ],
            [
                'name' => 'C++',
                'slug' => 'cpp',
                'icon' => 'code',
                'version' => '20',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'C++ is a high-performance language used in systems programming, game development, and performance-critical applications.',
                'example_code' => '#include <iostream>
using namespace std;

int main() {
    cout << "Hello, C++!" << endl;
    
    for (int i = 0; i < 3; i++) {
        cout << "Count: " << i << endl;
    }
    return 0;
}',
                'syntax_highlighting_mode' => 'cpp',
            ],
            [
                'name' => 'C#',
                'slug' => 'csharp',
                'icon' => 'code',
                'version' => '12',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'C# is a modern, object-oriented language developed by Microsoft, used in .NET applications, Unity games, and Windows development.',
                'example_code' => 'using System;

class Program {
    static void Main() {
        Console.WriteLine("Hello, C#!");
        
        for (int i = 0; i < 3; i++) {
            Console.WriteLine($"Count: {i}");
        }
    }
}',
                'syntax_highlighting_mode' => 'csharp',
            ],
            [
                'name' => 'Ruby',
                'slug' => 'ruby',
                'icon' => 'code',
                'version' => '3.2',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Ruby is an elegant, readable language known for rapid development and web frameworks like Ruby on Rails.',
                'example_code' => 'puts "Hello, Ruby!"

# Array iteration
[1, 2, 3].each do |n|
  puts "Count: #{n}"
end',
                'syntax_highlighting_mode' => 'ruby',
            ],
            [
                'name' => 'Go',
                'slug' => 'go',
                'icon' => 'code',
                'version' => '1.21',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Go is a modern compiled language created by Google, designed for simple syntax, fast compilation, and concurrent programming.',
                'example_code' => 'package main
import "fmt"

func main() {
    fmt.Println("Hello, Go!")
    
    for i := 0; i < 3; i++ {
        fmt.Printf("Count: %d\\n", i)
    }
}',
                'syntax_highlighting_mode' => 'go',
            ],
            [
                'name' => 'Rust',
                'slug' => 'rust',
                'icon' => 'code',
                'version' => '1.75',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Rust is a systems programming language that ensures memory safety and prevents data races through its unique ownership system.',
                'example_code' => 'fn main() {
    println!("Hello, Rust!");
    
    for i in 0..3 {
        println!("Count: {}", i);
    }
}',
                'syntax_highlighting_mode' => 'rust',
            ],
            [
                'name' => 'SQL',
                'slug' => 'sql',
                'icon' => 'database',
                'version' => '2023',
                'timeout_seconds' => 3,
                'is_active' => true,
                'description' => 'SQL is the standard language for querying and managing relational databases. Essential for data analysis and database administration.',
                'example_code' => '-- Select all users
SELECT id, name, email FROM users;

-- Count records
SELECT COUNT(*) FROM users
WHERE created_at > NOW() - INTERVAL 30 DAY;',
                'syntax_highlighting_mode' => 'sql',
            ],
            [
                'name' => 'Bash',
                'slug' => 'bash',
                'icon' => 'terminal',
                'version' => '5.2',
                'timeout_seconds' => 5,
                'is_active' => true,
                'description' => 'Bash is a shell scripting language used for automation, system administration, and command-line programming on Unix-like systems.',
                'example_code' => '#!/bin/bash
# Basic shell script

echo "Hello, Bash!"

for i in {0..2}; do
    echo "Count: $i"
done',
                'syntax_highlighting_mode' => 'bash',
            ],
        ];

        foreach ($languages as $lang) {
            ProgrammingLanguage::firstOrCreate(
                ['slug' => $lang['slug']],
                $lang
            );
        }
    }
}
