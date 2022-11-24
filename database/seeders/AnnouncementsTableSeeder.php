<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Announcement;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'slug' => Str::slug('Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
        $RS_Records = [
            [
                'user_id' => 1,
                'title' => 'What is Lorem Ipsum?',
                'description' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Why do we use it?',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'description' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic
                typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                with desktop publishing software like Aldus PageMaker including versions of Lorem
                Ipsum.</p>
                <p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Where does it come from?',
                'description' => "<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>"
            ],
            [
                'user_id' => 1,
                'title' => 'It is a long established fact that a reader will be
                distracted by the readable',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Placeholder content for this accordion, which is
                intended to
                demonstrate the Lorem Aldus PageMaker includingply dummy',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum is simply dummy',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                would look in a real-world application.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Printer took a gal',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Where can I get some?',
                'description' => "<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae ante rutrum, tristique elit a, lacinia enim. Quisque aliquam quam eget massa ultrices facilisis id non magna. Suspendisse placerat justo vel magna feugiat, sit amet porttitor odio porttitor. Cras at rutrum lectus. Nunc pellentesque sit amet erat eu venenatis. Curabitur consectetur lorem at congue ornare. Proin vel auctor tortor. Pellentesque a venenatis sapien, a iaculis lacus. Aenean eget sagittis libero, ac semper lorem. Ut in egestas massa.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Duis maximus lorem a mauris vulputate sollicitudin',
                'description' => "<p>Duis maximus lorem a mauris vulputate sollicitudin. Pellentesque sed semper lorem. Duis bibendum turpis vitae ultricies fermentum. Vestibulum imperdiet magna eget elit interdum, quis maximus tellus pulvinar. Nunc nulla justo, aliquet id dignissim ut, aliquam non justo. Cras porttitor efficitur diam, vel sagittis felis tincidunt eu. Donec eget tortor nisi. Aliquam erat volutpat. Curabitur quis blandit velit.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae ante rutrum, tristique elit a, lacinia enim. Quisque aliquam quam eget massa ultrices facilisis id non magna. Suspendisse placerat justo vel magna feugiat, sit amet porttitor odio porttitor. Cras at rutrum lectus. Nunc pellentesque sit amet erat eu venenatis. Curabitur consectetur lorem at congue ornare. Proin vel auctor tortor. Pellentesque a venenatis sapien, a iaculis lacus. Aenean eget sagittis libero, ac semper lorem. Ut in egestas massa.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum is dummy',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>
                <p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Printer took a gal is simply',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>
                <p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Vivamus rhoncus dui ipsum, ac tristique velit vestibulum ultricies',
                'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae ante rutrum, tristique elit a, lacinia enim. Quisque aliquam quam eget massa ultrices facilisis id non magna. Suspendisse placerat justo vel magna feugiat, sit amet porttitor odio porttitor. Cras at rutrum lectus. Nunc pellentesque sit amet erat eu venenatis. Curabitur consectetur lorem at congue ornare. Proin vel auctor tortor. Pellentesque a venenatis sapien, a iaculis lacus. Aenean eget sagittis libero, ac semper lorem. Ut in egestas massa.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'It is a long established fact that a reader will be
                distracted by the readable',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Tristique velit vestibulum ultricies',
                'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae ante rutrum, tristique elit a, lacinia enim. Quisque aliquam quam eget massa ultrices facilisis id non magna. Suspendisse placerat justo vel magna feugiat, sit amet porttitor odio porttitor.</p><p>Cras at rutrum lectus. Nunc pellentesque sit amet erat eu venenatis. Curabitur consectetur lorem at congue ornare. Proin vel auctor tortor. Pellentesque a venenatis sapien, a iaculis lacus. Aenean eget sagittis libero, ac semper lorem. Ut in egestas massa.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum is dummy',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>
                <p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'It is a long established fact that a reader will be
                distracted by the readable',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum is dummy',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>
                <p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Lorem Ipsum Placeholder content for this accordion',
                'description' => "<p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>"
            ],
            [
                'user_id' => 1,
                'title' => 'Printer took a gal is simply',
                'description' => "<p>It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many desktop publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                versions have evolved over the years, sometimes</p>
                <p>Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's
                accordion
                body. Nothing more exciting happening here in terms of content, but just filling up
                the
                space to make it look, at least at first glance, a bit more representative of how
                this
                would look in a real-world application.</p>"
            ],
        ];

        $i = 1;
        foreach ($RS_Records as $RS_Row) {
            Announcement::create(
                [
                    'user_id' => $RS_Row['user_id'],
                    'title' => $RS_Row['title'],
                    'slug' => Str::slug($RS_Row['title'] . '-' . $i),
                    'description' => $RS_Row['description'],
                ]
            );
            $i++;
        }
    }
}
