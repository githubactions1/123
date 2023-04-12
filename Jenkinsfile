pipeline{
    agent any
      environment{
        staging_server='44.193.5.155'
    }
    stages{
        stage('Deploy to Remote'){
           steps{
           sh 'scp -r {WORKSPACE}/* root@${staging_server}:var/www/html/123/*'
           }
        }
    }
}