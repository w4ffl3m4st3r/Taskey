<?php

namespace App\Controllers;

use Exception;
use Framework\Request;
use Framework\Response;
use Framework\ResponseFactory;
use App\Repositories\TaskRepositoryInterface;

class TaskController
{
    private ResponseFactory $responseFactory;

    private TaskRepositoryInterface $taskRepository;

    public function __construct(ResponseFactory $responseFactory, TaskRepositoryInterface $taskRepository)
    {
        $this->responseFactory = $responseFactory;
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function index(): Response
    {
        $tasks = $this->taskRepository->all();
        return $this->responseFactory->view('tasks/index.html.twig', ["tasks" => $tasks]);
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function create(): Response
    {
        return $this->responseFactory->view('tasks/create.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function show(Request $request): Response
    {
        $taskId = (int)$request->get('id');
        $task = $this->taskRepository->find($taskId);

        if ($task === null) {
            return $this->responseFactory->notFound();
        }

        return $this->responseFactory->view('tasks/show.html.twig', ["task" => $task]);
    }
}
