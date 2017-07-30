<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

echo shell_exec( 'rm -rf ' . dirname( __DIR__ ) . '/.git' );
echo shell_exec( 'rm -rf ' . dirname( __DIR__ ) . '/.idea' );

echo ".git/ and .idea/ removed\n";

$projectConfig = parse_ini_file( dirname( __DIR__ ) . '/.project' );
$dir           = new RecursiveDirectoryIterator( dirname( __DIR__ ) );
$iterator      = new RecursiveIteratorIterator( $dir );

echo "Project settings:\n";
print_r( $projectConfig );
echo "\n";

/** @var SplFileInfo $item */
foreach ( $iterator as $item )
{
	if ( $item->isDir() )
	{
		continue;
	}

	if ( $item->getFilename() === '.project' )
	{
		continue;
	}

	echo "\n{$item->getRealPath()}\n";

	$count   = 0;
	$inFile  = file_get_contents( $item->getRealPath() );
	$outFile = str_replace( array_keys( $projectConfig ), array_values( $projectConfig ), $inFile, $count );

	echo "> {$count} replacements... ";

	if ( 0 === $count )
	{
		echo "Skipping.\n";
		continue;
	}

	if ( file_put_contents( $item->getRealPath(), $outFile ) )
	{
		echo "√ File written.\n";
	}
	else
	{
		echo "X File not written!\n";
	}
}
