<?php

include 'config/config.php';

if (ENVIRONMENT == 'production'){
	error_reporting(0); ini_set('display_errors', 0);
}

spl_autoload_register(function ($class_name)
{
    include $class_name . '.php';
});

// According to the task I did not implement any routing structure:

$example = <<<EOF
<?xml version="1.0"?>
<Reply>
	<Header>
		<Method>cGetBetHistory</Method>
		<ErrorCode>0</ErrorCode>
		<MerchantID>1235</MerchantID>
		<MessageID>H110830134512K9n12</MessageID>
	</Header>
	<Param>
		<TotalRecord>1</TotalRecord>
		<ErrorDesc></ErrorDesc>
		<BetInfo>
			<No>2</No>
			<UserID>Player_1313455</UserID>
			<BetTime>08/15/2011 09:37:48</BetTime>
			<BalanceTime>08/15/2011 09:38:31</BalanceTime>
			<ProductID>Baccarat</ProductID>
			<GameInterface>3DView</GameInterface>
			<BetID>a2e3f40b-acae4c58aae8fbd4f755b694</BetID>
			<BetType>Single</BetType>
			<BetAmount>10000</BetAmount>
			<WinLoss>0</WinLoss>
			<BetResult>Loss</BetResult>
			<BetArrays>
				<Bet>
					<GameID>98</GameID>
					<SubBetType>Player</SubBetType>
					<GameResult>P CLUB A DIAMOND A SPADE 9 ,B DIAMOND 3 CLUB 9 DIAMOND 6</GameResult>
					<WinningBet>Banker</WinningBet>
					<TableID>Baccarat_1</TableID>
					<DealerID>6</DealerID>
				</Bet>
			</BetArrays>
		</BetInfo>
		<BetInfo>
			<No>3</No>
			<UserID>Player_1313455</UserID>
			<BetTime>08/15/2011 09:44:48</BetTime>
			<BalanceTime>08/15/2011 09:45:01</BalanceTime>
			<ProductID>Roulette</ProductID>
			<GameInterface></GameInterface>
			<BetID>86791c28-dbb2-4103-a7e8-f1c206bb417d</BetID>
			<BetType>Single</BetType>
			<BetAmount>100000</BetAmount>
			<WinLoss>0</WinLoss>
			<BetResult>Loss</BetResult>
			<BetArrays>
				<Bet>
					<GameID>R11306251387</GameID>
					<SubBetType>Red</SubBetType>
					<GameResult>32</GameResult>
					<WinningBet>32, Red, 19-36</WinningBet>
					<TableID>Roulette 1</TableID>
					<DealerID>6</DealerID>
				</Bet>
			</BetArrays>
		</BetInfo>
	</Param>
</Reply>
EOF;


$parseXml = new ParseXml($example);
$parseXml->renderData();