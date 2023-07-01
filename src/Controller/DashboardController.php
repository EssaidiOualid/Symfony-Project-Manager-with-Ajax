<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\MessageRepository;
use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DashboardController extends AbstractController
{
    private $projectRepository;
    private $messageRepository;
    private $taskRepository;
    private $userRepository;

    public function __construct(
        ProjectRepository $projectRepository,
        MessageRepository $messageRepository,
        TaskRepository $taskRepository,
        UserRepository $userRepository,
    ) {
        $this->projectRepository = $projectRepository;
        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;
        $this->taskRepository = $taskRepository;
    }
    #[Route('/dashboard', name: 'dashboard')]
    public function index(Security $security): Response
    {
        /** @var User*/
        $user = $security->getUser();
        $projectLits = $this->projectRepository->findAll();
        $memberList = $this->userRepository->findAll();
        $messages = $this->messageRepository->findBy(['recipent' => $user->getId()]);

        

        //preparing data for the chart
        $currentDate = Carbon::now();
        $last7days = array();
        $last7days[] = $currentDate->toDateString();
        for($i = 1; $i < 7; $i++){
            $date = $currentDate->subDay()->toDateString();
            $last7days[] = $date;
        }
        $taskList = $this->taskRepository->findAll();
        $last7days = array_reverse($last7days);

        $tab = array();
        foreach ($memberList as $index => $member) {
            $tab[$index]['object'] = $member;
            $count = 0;
        
            foreach ($member->getTasks() as $task) {
                if ($task->getStatus() === 'Finished') {
                    $count++;
                }
            }
        
            $tab[$index]['nmbrOfTask'] = $count;
        }

        usort($tab, function($a, $b){
            return $b['nmbrOfTask'] - $a['nmbrOfTask'];
        });

        $tab = array_slice($tab, 0, 3);
        


        return $this->render('dashboard/index.html.twig', [
            'project_list' => $projectLits,
            'task_list' => $taskList,
            'member_list' => $memberList,
            'messages' => $messages,
            'last7days' => $last7days,
            'top_3_member' => $tab
        ]);
    }
}
