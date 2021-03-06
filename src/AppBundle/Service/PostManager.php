<?php

namespace AppBundle\Service;

use AppBundle\Entity\Post;
use AppBundle\Form\Type;
use Doctrine\ORM\EntityManager;

/**
 * Class PostManager
 */
class PostManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }


    public function createPosts(Post $posts)
    {
        $this->em->persist($posts);
        $this->em->flush();
    }

    /**
     * Find all Posts
     *
     * @return \AppBundle\Entity\Post[]|array
     */
    public function showAllPosts()
    {
        $posts = $this->em->getRepository('AppBundle:Post')->findAll();

        return $posts;
    }

    /**
     * @param $slug
     * @return Post|null|object
     */
    public function findBySlug($slug)
    {
        $post = $this->em->getRepository('AppBundle:Post')->findOneBy([
            'slug' => $slug,
        ]);

        if (null === $post) {
            throw $this->createNotFoundException('Post was not found.');
        }

        return $post;
    }

    /**
     * Find all the latest posts
     *
     * @param integer $num
     * @return array
     */
    public function findLatest($num)
    {
        $latestPost = $this->em->getRepository('AppBundle:Post')->findLatest($num);

        return $latestPost;
    }


}
