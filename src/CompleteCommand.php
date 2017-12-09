<?php namespace Palmacodi;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
	public function configure ()
	{
		$this->setBame('complete')
			->setDescription('Complete a task by its id')
			->addArgument('id', InputArgument::REQUIRED);

	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$id = $input->getArgument('id');

		$this->database->query(
			'delete from tasks(description) where id = :id',
			compact('description')
		);

		$output->writeln('<info>Task Completed!</info>');

		$this->showTasks($output);
	}
}