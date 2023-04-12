pipeline{
    agent any
      environment{
        staging_server='44.193.5.155'
    }
    environment
    stages{
        stage ('Deploy to Remote'){
           steps{
            scp -r {WORKSPACE}/* root@${staging_server}:var/www/html/123
           }
        }
    }
}