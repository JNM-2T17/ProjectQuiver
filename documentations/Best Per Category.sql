SELECT id
				FROM (SELECT recog, grade,dateAdded
						FROM (SELECT recog,grade,MAX(A.dateAdded) dateAdded
								FROM (SELECT name, class, abstract, description
												, AVG(grade) AS grade, recog
												, P.dateAdded
										FROM pq_project P 
										INNER JOIN pq_project_grades PG 
											ON P.id = PG.id AND P.status = 1 
												AND PG.status = 1
										INNER JOIN pq_project_recogs PR 
											ON P.id = PR.id
										GROUP BY P.id) A
						GROUP BY recog, grade) B NATURAL JOIN 
						(SELECT recog,MAX(grade) as grade
							FROM (SELECT name, class, abstract, description
											, AVG(grade) AS grade, recog
											, P.dateAdded
									FROM pq_project P 
									INNER JOIN pq_project_grades PG 
										ON P.id = PG.id AND P.status = 1 
											AND PG.status = 1
									INNER JOIN pq_project_recogs PR 
										ON P.id = PR.id
									GROUP BY P.id) A
							GROUP BY recog)C)A2
						NATURAL JOIN 
				        (SELECT P.id,AVG(grade) AS grade, recog, P.dateAdded
								FROM pq_project P 
								INNER JOIN pq_project_grades PG 
									ON P.id = PG.id AND P.status = 1 
										AND PG.status = 1
								INNER JOIN pq_project_recogs PR 
									ON P.id = PR.id
								GROUP BY P.id)B