<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Analytics\Controller;

include '/var/www/html/libs/google-api/src/Google_Client.php';
include '/var/www/html/libs/google-api/src/contrib/Google_AnalyticsService.php';

use \Google_Client;
use Zend\View\Helper\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class AuthorizeController extends AbstractActionController
{
	public $client;
	public $analytics;
	public function loginAction()
	{

		$client = new \Google_Client();
		$this->client = $client;
		$this->client->setApplicationName('Hello Analytics API Sample');

		// Visit //code.google.com/apis/console?api=analytics to generate your
		// client id, client secret, and to register your redirect uri.
		$this->client->setClientId('321895626166.apps.googleusercontent.com');
		$this->client->setClientSecret('k6l-6SBsZE-37n17TM2XxRHL');
		$this->client->setRedirectUri('http://testcare.cdsglobal.ca/billing/analytics/report/index');
		$this->client->setDeveloperKey('AIzaSyDGDPyzmvtJ9N-C4NkQ_XwrTWQvdSpN03I');
		$this->client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));

		// Magic. Returns objects from the Analytics Service instead of associative arrays.
		$this->client->setUseObjects(true);

		if (isset($_GET['code'])) {
			$this->client->authenticate($_GET['code']);
			$_SESSION['token'] = $this->client->getAccessToken();
// 			$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			$redirect = 'http://testcare.cdsglobal.ca/billing/analytics/authorize/list';
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
			$this->client->setAccessToken($_SESSION['token']);
		}

		if (!$this->client->getAccessToken()) {
			$authUrl = $this->client->createAuthUrl();
			print "<a class='login' href='$authUrl'>Connect Me!</a>";

		} else {
			$this->analytics = new \Google_AnalyticsService($this->client);
			$this->runMainDemo($this->analytics);
		}

		return new ViewModel(array(
// 			'data' => $this->runMainDemo($this->analytics)
		));
	}

	function runMainDemo(&$analytics) {
		try {
			// Step 2. Get the user's first profile ID.
			$profileId = $this->getFirstProfileId($analytics);
			if (isset($profileId)) {
				// Step 3. Query the Core Reporting API.
				$results = $this->getResults($analytics, $profileId);
				// Step 4. Output the results.
				$this->printResults($results);
			}
		} catch (\apiServiceException $e) {
			// Error from the API.
			print 'There was an API error : ' . $e->getCode() . ' : ' . $e->getMessage();
		} catch (\Exception $e) {
			print 'There wan a general error : ' . $e->getMessage();
		}
	}

	function getFirstprofileId(&$analytics) {
		$accounts = $analytics->management_accounts->listManagementAccounts();
		if (count($accounts->getItems()) > 0) {
			$items = $accounts->getItems();
			$firstAccountId = $items[0]->getId();
			$webproperties = $analytics->management_webproperties
			->listManagementWebproperties($firstAccountId);
			if (count($webproperties->getItems()) > 0) {
				$items = $webproperties->getItems();
				$firstWebpropertyId = $items[0]->getId();
				$profiles = $analytics->management_profiles
				->listManagementProfiles($firstAccountId, $firstWebpropertyId);
				if (count($profiles->getItems()) > 0) {
					$items = $profiles->getItems();
					return $items[0]->getId();
				} else {
					throw new \Exception('No profiles found for this user.');
				}
			} else {
				throw new \Exception('No webproperties found for this user.');
			}
		} else {
			throw new \Exception('No accounts found for this user.');
		}
	}

	function getResults(&$analytics, $profileId) {
		return $analytics->data_ga->get(
		'ga:' . $profileId,
		'2012-03-03',
		'2012-03-03',
		'ga:visits');
	}

	function printResults(&$results) {
		if (count($results->getRows()) > 0) {
			$profileName = $results->getProfileInfo()->getProfileName();
			$rows = $results->getRows();
			$visits = $rows[0][0];

			print "<p>First profile found: $profileName</p>";
			print "<p>Total visits: $visits</p>";

		} else {
		print '<p>No results found.</p>';
  }
		}

	public function listAction()
	{
		$this->analytics = new \Google_AnalyticsService($this->client);
		$this->runMainDemo($this->analytics);

		return new ViewModel(array(
// 			'data' => $this->runMainDemo($this->analytics)
		));
	}
}
