<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;
use AppBundle\Entity\User;

class PostFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $user1 = new User();
        $user1->setUsername('Jan');
        $user1->setEmail('test@test.com');
        $user1->setPassword('password1');
        $post->setTitle('Lorem ipsum dolor sit amet');
        $post->setBody('Proin et elementum dui. Aliquam non mattis ex, vitae lobortis nisl. Cras nec dapibus tortor. Sed viverra nulla sit amet lorem suscipit condimentum. Phasellus dapibus velit ac mi gravida commodo. Vestibulum pulvinar orci dolor, sit amet faucibus sem congue in. Nam dictum sit amet orci eu maximus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam ac sollicitudin odio, et finibus mauris. Duis maximus tincidunt tristique.');
        $post->setImage('greenforest.jpg');
        $post->setAuthor($user1);
        $post->setPublishedAt(new \DateTime());
        $post->setUpdatedAt($post->getPublishedAt());
        $manager->persist($user1);
        $manager->persist($post);

        $post2 = new Post();
        $user2 = new User();
        $user2->setUsername('Zander');
        $user2->setEmail('test@test2.com');
        $user2->setPassword('password2');
        $post2->setTitle('Lorem ipsum dolor sit amet');
        $post2->setBody('Integer quam lectus, congue quis nulla sed, blandit rutrum magna. Integer at orci nec massa sodales dictum eget interdum risus. Pellentesque ut lobortis ex, rutrum fermentum dui. Nullam consectetur maximus leo eu dictum. In eget consectetur risus. In enim dui, ullamcorper vel porta id, aliquam nec diam. Quisque ipsum ligula, venenatis eget urna ac, finibus suscipit sapien.');
        $post2->setImage('mountain.jpg');
        $post2->setAuthor($user2);
        $post2->setPublishedAt(new \DateTime());
        $post2->setUpdatedAt($post2->getPublishedAt());
        $manager->persist($user2);
        $manager->persist($post2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
