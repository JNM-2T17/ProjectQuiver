SELECT name, class, abstract, description, grade, recog
FROM (SELECT recog, MAX(grade) AS grade
		FROM (SELECT name, class, abstract, description, AVG(grade) AS grade, recog
						FROM pq_project P INNER JOIN pq_project_grades PG 
							ON P.id = PG.id AND P.status = 1 AND PG.status = 1
						INNER JOIN pq_project_recogs PR 
							ON P.id = PR.id
						GROUP BY P.id)A
		GROUP BY recog)A2
		NATURAL JOIN 
        (SELECT name, class, abstract, description, AVG(grade) AS grade, recog
				FROM pq_project P INNER JOIN pq_project_grades PG 
					ON P.id = PG.id AND P.status = 1 AND PG.status = 1
				INNER JOIN pq_project_recogs PR 
					ON P.id = PR.id
				GROUP BY P.id)B