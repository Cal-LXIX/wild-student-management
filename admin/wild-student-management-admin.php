<?php

function showCreateStudentForm() {

    global $wpdb;

    if(isset($_POST['lastname']) && isset($_POST['firstname'])) {
        $lastname = htmlentities($_POST['lastname']);
        $firstname = htmlentities($_POST['firstname']);

        $wpdb->query(
            $wpdb->prepare(
                "
                    INSERT INTO {$wpdb->prefix}student (lastname, firstname)
                    VALUES (%s, %s);
                ",
                $lastname,
                $firstname
            )
        );

        echo "<p>Nouvel étudiant enregistré !</p>";

    }

    $students = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}student;", OBJECT);

    ?>

        <div class="container">
            <h1>Création d'étudiant</h1>
            
            <form method="POST">  
                <p>
                    <label for="">Nom : </label>
                    <input type="text" name="lastname"/>
                </p>

                <p>
                    <label for="">Prénom : </label>
                    <input type="text" name="firstname"/>
                </p>

                <p>
                    <input type="submit" value="Créer">
                </p>
            </form>

            <br>
            <br>

            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach($students as $student) {

                        echo "
                        <tr>
                            <td>
                                $student->lastname
                            </td>
                            <td>
                                $student->firstname
                            </td>
                        </tr>
                        ";

                    }
                    
                    ?>
                </tbody>
            </table>

        </div>
    <?php
}

add_action( 'admin_menu', 'studentManagementInit' );

function studentManagementInit() {
    add_menu_page(
        'Wild Student Management',
        'Students Management',
        'manage_options',
        'wildstumgmt',
        'showCreateStudentForm'
    );
}