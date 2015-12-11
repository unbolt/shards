<?php namespace Shards\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Shards\Movement;

class MovementServer extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'movement:serve';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Start movement server.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$port = intval($this->option('port'));

		$this->info("Starting movement web socket server on port " . $port);

		$server = IoServer::factory(
        	new HttpServer(
	            new WsServer(
	                new Movement()
	            )
	        ),
	        $port,
	        '0.0.0.0'
	    );

	    $server->run();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['port', 'p', InputOption::VALUE_OPTIONAL, 'Port where to launch the server.', 9091],
		];
	}

}
