<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $fullNames = [
            'John Doe',
            'Jane Smith',
            'Michael Brown',
            'Sophia Anderson',
            'David Johnson',
            'Sarah Williams',
            'Emily Davis',
            'James Miller',
            'Olivia Wilson',
            'Ethan Taylor',
            'Alex Turner',
            'Isabella Campbell',
            'William White',
            'Mia Thompson',
            'Benjamin Harris',
            'Ava Davis',
            'Jacob Robinson',
            'Emma Clark',
            'Daniel Martinez',
            'Sophie Lewis',
            'Matthew Hall',
            'Chloe Baker',
            'Alexander Green',
            'Oliver Young',
            'Grace Mitchell',
            'Logan Lee',
            'Abigail Walker',
            'Ryan Hill',
            'Emily Stewart',
            'Jackson Turner',
            'Elizabeth Adams',
            'Lucas Carter',
            'Charlotte Murphy',
            'Gabriel Nelson',
            'Lily King',
            'Samuel Rivera',
            'Ella Cooper',
            'Henry Ward',
            'Victoria Perry',
            'Christopher Bell',
            'Scarlett Phillips',
            'Andrew Butler',
            'Aria Wright'
        ];

        $studentMajorOptions = [
            'Computer Science',
            'Electrical Engineering',
            'Bioprocess Engineering',
            'Mechanical Engineering'
        ];

        $entryYears = [2015, 2016, 2017, 2018];
        $studentMajorIndex = 0;

        for ($i = 0; $i < 40; $i++) {
            $fullName = $this->generateUniqueFullName($i, $fullNames);
            $studentIdNumber = $this->generateUniqueStudentIdNumber();
            $entryYear = $this->generateEntryYear($i, $entryYears);
            $studentMajor = $this->generateStudentMajor($studentMajorIndex, $studentMajorOptions);
            $username = $this->generateUsername($fullName);
            $email = $this->generateEmail($username);
            $role = 'user';
            $password = bcrypt('password');

            User::create([
                'full_name' => $fullName,
                'student_id_number' => $studentIdNumber,
                'entry_year' => $entryYear,
                'student_major' => $studentMajor,
                'username' => $username,
                'email' => $email,
                'role' => $role,
                'password' => $password
            ]);

            $studentMajorIndex++;
            if ($studentMajorIndex >= count($studentMajorOptions)) {
                $studentMajorIndex = 0;
            }
        }
    }

        /**
 * Generate a unique full name based on the given index and array of names.
 *
 * @param int $index
 * @param array $names
 * @return string
 */
private function generateUniqueFullName(int $index, array $names): string
{
    $fullNameIndex = $index % count($names);
    $fullName = $names[$fullNameIndex];
    return $fullName;
}
    

    /**
     * Generate a unique student ID number.
     *
     * @return int
     */
    private function generateUniqueStudentIdNumber(): int
    {
        $studentIdNumber = rand(100000000, 999999999);
        return $studentIdNumber;
    }

    /**
     * Generate entry year based on the given index and array of years.
     *
     * @param int $index
     * @param array $years
     * @return int
     */
    private function generateEntryYear(int $index, array $years): int
    {
        $entryYearIndex = (int) ($index / 10) % count($years);
        $entryYear = $years[$entryYearIndex];
        return $entryYear;
    }

    /**
     * Generate student major based on the given index and options.
     *
     * @param int $index
     * @param array $options
     * @return string
     */
    private function generateStudentMajor(int $index, array $options): string
    {
        $studentMajorIndex = $index % count($options);
        $studentMajor = $options[$studentMajorIndex];
        return $studentMajor;
    }

    /**
    * Generate a unique username from the given full name.
    *
    * @param string $fullName
    * @param int $index
    * @return string
    */
    private function generateUsername(string $fullName): string
    {
        $username = Str::lower(str_replace(' ', '', $fullName));
        return $username;
    }
    

    /**
     * Generate an email from the given username.
     *
     * @param string $username
     * @return string
     */
    private function generateEmail(string $username): string
    {
        $email = $username . '@telkomuniversity.ac.id';
        return $email;
    }
}
