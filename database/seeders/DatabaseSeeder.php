<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Discussions;
use App\Models\EmailVerifications;
use App\Models\Forums;
use App\Models\ForumSettings;
use App\Models\Likes;
use App\Models\Moderators;
use App\Models\Notifications;
use App\Models\Reports;
use App\Models\Roles;
use App\Models\Tags;
use App\Models\Uploads;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserActivityLogs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            RolesSeeders::class,
            ForumsSeeder::class,
            RoleForumSeeder::class,
            CategoriesSeeder::class,
            TagsSeeder::class,
            ModeratorsSeeder::class,
            UserActivityLogSeeder::class,
            ForumSettingsSeeder::class,
            EmailVerificationsSeeder::class,
            DiscussionsSeeder::class,
            CommentsSeeder::class,
            UploadsSeeder::class,
            LikesSeeder::class,
            ReportsSeeder::class,
            NotificationsSeeder::class,
            UserRoleAssigmentSeeder::class,
            UserForumsSeeder::class,
            ForumCategoriesSeeder::class,
            ForumModeratorsSeeder::class,
            DiscussionTagsSeeder::class,
            DiscussionModeratorsSeeder::class,
            RoleCategoryAssignmentsSeeder::class,
            PageSeeder::class





            //tüm seedersların oluşturulma zamanı ve foreign key durumları dikkate alınarak yapılacak.+
            //Yukarıdan aşağıya veri okumaya başlar.



            //Pages adlı model'den verileri çekip navbar Headers içerisine koyacaksın.

            //HasMany ve Belong To Modeller de tek tek yapacaksın.
            //Eğer yukarıdakileri yaparsan da Kategoileri anasayfaya çekeceksin mesela
            //veritabanına bir kategori eklersem anasayfaya da otomatik 1 tane oluşacak.



        ]);
    }
}
